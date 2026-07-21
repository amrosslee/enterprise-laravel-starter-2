<?php

namespace App\Enums;

enum UserRole: string
{
    case Manager = 'manager';
    
    case HR = 'hr';

    case Engineer = 'eng';

    case Developer = 'dev';

}
