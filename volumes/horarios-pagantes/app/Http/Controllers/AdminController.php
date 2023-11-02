<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;

use function Psy\debug;

class AdminController extends Controller
{
    public function exportUsers()
    {
        if (Auth::user()->role === 'admin') {
            $getRecord = User::all('name', 'email', 'contact');

            $fileName = 'LeadsList_' . \date('dmY') . '.csv';
            \header("Content-Description: File Transfer");
            \header("Content-Disposition: attachment; filename=$fileName");
            \header("Content-Type: application/csv");
            $getCsv = [['name', 'email', 'contact'],];
            foreach ($getRecord as $val) {
                $getCsv[] = [$val->name, $val->email, $val->contact];
            }
            $file = \fopen('php://output', 'w');

            foreach ($getCsv as $line) {
                \fputcsv($file, $line);
            }
            \fclose($file);
            exit;
        } else {
            return redirect('games');
        }
    }
}
