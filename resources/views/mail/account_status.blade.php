<h1>Account Status Mail</h1>

Your account has been @if ($status == 1)
    Approved
@elseif ($status == 2)
    Rejected
@endif by admin.