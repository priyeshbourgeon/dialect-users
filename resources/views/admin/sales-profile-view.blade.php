<table class="uk-table uk-table-divider">
    <tbody>
        <tr>
            <td>Status</td>
            <td>
            @if($sales->password =='')
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
            <td>{{ $sales->name ?? '' }}</td>
        </tr>
        <tr>
            <td>Designation</td>
            <td>{{ $sales->role ?? '' }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>{{ $sales->email ?? '' }}</td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td>{{ $sales->mobile ?? '' }}</td>
        </tr>
        <tr>
            <td>Landline</td>
            <td>{{ $sales->landline ?? '' }}</td>
        </tr>
        <tr>
            <td>Extenstion</td>
            <td>{{ $sales->landline ?? '' }}</td>
        </tr>
    </tbody>
</table>