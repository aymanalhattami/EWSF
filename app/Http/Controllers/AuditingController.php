<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Auditings;
use Charts;
use PDF;

class AuditingController extends Controller
{
    public function index()
    {
        $allAuditing = Auditings::orderBy('id', 'desc')->paginate(15);

        return view('auditing.index',compact('allAuditing'));
    }

    public function search()
    {
        $auditingData = $_GET['a_d'];
        $targetAudit = DB::select("SELECT * FROM auditings WHERE id like '" . "%$auditingData%" . "' OR user_name like '" . "%$auditingData%" . "' OR user_email like '" . "%$auditingData%" . "' OR `type` like '" . "%$auditingData%" . "' OR `action` like '" . "%$auditingData%" . "' OR created_at like '" . "%$auditingData%" . "' ORDER BY id DESC");
        return $targetAudit;
    }

    public function getPDF()
    {
        DB::insert("INSERT INTO auditings (`user_email`, `user_name`, `type`, `action`) VALUES('" . auth()->user()->email . "', '" . auth()->user()->name . "', 'Generate Report', 'auditing data reports')");

        $allAuditingData = DB::select("SELECT * FROM auditings ORDER BY id DESC");

        $pdf = PDF::loadView('auditing.auditingPDF', ['allAuditingData' => $allAuditingData]);

        return $pdf->download('AuditingData.pdf');
    }
}
