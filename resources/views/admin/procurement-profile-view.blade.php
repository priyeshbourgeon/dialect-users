<table class="uk-table uk-table-divider">
    <tbody>
        <tr>
            <td>Status</td>
            <td>
            @if($procurement->password =='')
            <span class="uk-label uk-align-left uk-animation-shake" style="background-color:red">
                Activation Pending</span>
            @else
            <span class="uk-label uk-align-left uk-animation-shake" style="background-color:green">
                Active</span>
            @endif
            </td>
        </tr>
        <tr>
            <td>Name</td>
            <td>{{ $procurement->name ?? '' }}</td>
        </tr>
        <tr>
            <td>Designation</td>
            <td>{{ $procurement->role ?? '' }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $procurement->email ?? '' }}</td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>{{ $procurement->mobile ?? '' }}</td>
        </tr>
        <tr>
            <td>Landline</td>
            <td>{{ $procurement->landline ?? '' }}</td>
        </tr>
        <tr>
            <td>Extenstion</td>
            <td>{{ $procurement->landline ?? '' }}</td>
        </tr>
    </tbody>
</table>