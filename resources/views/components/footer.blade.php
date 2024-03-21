<footer class="main-footer">
    <div class="footer-left">
        Copyright &copy; {{ date('Y') }}
    </div>
    <div class="footer-right">
    </div>
</footer>
@php
    $clientIP = Request::ip();
    $clientDo = request()->segments();
    $doing = $clientDo ? $clientDo[0] : Request::route()->getName();
    $log = [
        'iduser' => auth()->user()->id,
        'nama' => auth()->user()->username,
        'level' => auth()->user()->role,
        'datetime' => date('Y-m-d H:i:s'),
        'do' => Str::substr($doing, 0, 30),
        'ipaddr' => $clientIP,
    ];
    DB::table('userlog')->insert($log);
@endphp
