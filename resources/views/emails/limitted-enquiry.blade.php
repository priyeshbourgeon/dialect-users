<!DOCTYPE html>
<html>

<head>
    <title>Dialect B2B</title>
</head>

<body>
    <p>Hi</p>
    <p>Notification from Dialect B2B</p>
    <!-- <p>{{ $details['subject']  }}</p> -->
    <p>You have new enquiries under your business categories waiting for you.</p>
    <form method="post" action="{{ route('users.store') }}">  
   @csrf
        <button class = "btn btn-success" type="submit">
             Click Here
        </button>
    </form>
    <strong>Thank you</strong>
</body>

</html>
