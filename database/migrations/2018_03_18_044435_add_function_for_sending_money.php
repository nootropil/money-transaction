<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddFunctionForSendingMoney extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE FUNCTION send_money_from_user_to_user (usernameFrom TEXT, usernameTo TEXT, amountOfMoney INT) RETURNS void AS $$         
            BEGIN
            
                LOCK TABLE public.user IN SHARE ROW EXCLUSIVE MODE;  
                                
                IF ((SELECT EXISTS(SELECT 1 FROM public.user where username = usernameFrom)) IS FALSE) THEN
                    RAISE EXCEPTION '||Пользователь % не существует||', usernameFrom;
                END IF;
                    
                IF ((SELECT EXISTS(SELECT 1 FROM public.user where username = usernameTo)) IS FALSE) THEN
                    RAISE EXCEPTION '||Пользователь % не существует||', usernameTo;
                END IF;
                    
                IF ((SELECT EXISTS(SELECT 1 FROM public.user where username = usernameFrom AND money >= amountOfMoney)) IS FALSE) THEN
                    RAISE EXCEPTION '||Не достаточно средств на счету пользователя %||', usernameFrom;
                END IF;
                    
                UPDATE public.user SET money = money - amountOfMoney WHERE username = usernameFrom;
                UPDATE public.user SET money = money + amountOfMoney WHERE username = usernameTo; 
                 
            END;            
        $$ LANGUAGE plpgsql;        
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP FUNCTION send_money_from_user_to_user(TEXT, TEXT, INT)');
    }
}
