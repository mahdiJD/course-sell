<?php
namespace App\Enums;
enum Role:string{
    case Root = 'مدیر';
    case Editor = 'ویرایشگر';
    case Teacher = 'مدرس';
    case Student = 'دانشجو';
}
