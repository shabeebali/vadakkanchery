<style>
.page-break {
    page-break-after: always;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
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
                <td class="p">
                    Member Details
                    <br/>
                    Name: {{ \Illuminate\Support\Str::headline($member->name) }}
                    <br/>
                    Address: {{ \Illuminate\Support\Str::headline($member->address) }}
                    <br/>
                    DOB: {{ \Illuminate\Support\Str::headline($member->dob) }}
                </td>
                <td class="p">
                    Spouse Details
                    <br/>
                    Name: {{ \Illuminate\Support\Str::headline($member->spouse->name) }}
                    <br/>
                    Address: {{ \Illuminate\Support\Str::headline($member->spouse->address) }}
                    <br/>
                    DOB: {{ \Illuminate\Support\Str::headline($member->spouse->dob) }}
                </td>
            </tr>
        </tbody
    </table
    <div class="page-break"></div>
@endforeach