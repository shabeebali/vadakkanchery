<style>
.page-break {
    page-break-after: always;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
td {
    padding: 10px;
}
.fw {
    width: 100%;
}
.center {
    text-align: center;
}
.py {
    padding: 15px 0px;
}
.p {
    padding: 10px;
}
</style>
@foreach ($data as $member)
    <table class="table fw">
        <tbody class="table">
            <tr>
                <td colspan="2" class="center py">വാടിയിൽ വടക്കാഞ്ചേരി കുടുംബ സമിതി</td>
            </tr>
            <tr>
                <td>
                    Member Details
                    <br/>
                    Name: {{ \Illuminate\Support\Str::headline($member->name) }}
                    <br/>
                    Address: {{ \Illuminate\Support\Str::headline($member->address) }}
                    <br/>
                    DOB: {{ $member->dob }}
                </td>
                <td>
                    Spouse Details
                    <br/>
                    Name: {{ \Illuminate\Support\Str::headline($member->spouse->name) }}
                    <br/>
                    Address: {{ \Illuminate\Support\Str::headline($member->spouse->address) }}
                    <br/>
                    DOB: {{ $member->spouse->dob }}
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table">
        <tbody class="table">
            <tr>
                <td>Name</td>
                <td>DOB</td>
                <td>Blood Group</td>
            </tr>
            @foreach($member->children as $child)
                <tr>
                    <td>{{ \Illuminate\Support\Str::headline($child->name)}}</td>
                    <td>{{$child->dob}}</td>
                    <td>{{$child->blood_group}}</td>
                <tr>
                @if ($child->married)
                    <tr>
                        <td>{{ \Illuminate\Support\Str::headline($child->spouse->name)}}</td>
                        <td>{{$child->spouse->dob}}</td>
                        <td>{{$child->spouse->blood_group}}</td>
                    <tr>
                    @foreach ($child->children as $grandChild)
                        <tr>
                            <td>{{ \Illuminate\Support\Str::headline($grandChild->name)}}</td>
                            <td>{{$grandChild->dob}}</td>
                            <td>{{$grandChild->blood_group}}</td>
                        <tr>
                    @endforeach
                @endif
            @endforeach
    <div class="page-break"></div>
@endforeach