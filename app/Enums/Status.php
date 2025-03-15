<?php
namespace App\Enums;
enum Status:string{
    case Don = 'به اتمام رسیده';
    case InProgres = 'در حال ضبط';
    case Stop = 'منقضی شده';
    case Draft = 'در حال بررسی';
}
