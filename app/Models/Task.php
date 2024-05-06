<?php
//Angel Scarpetta NRC:66988 ID:862954 fecha: 06/05/2024
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

   protected $fillable = ['title', 'descripcion', 'due_date', 'status', 'updated_at', 'created_at'];
}
