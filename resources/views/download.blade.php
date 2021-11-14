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
                    {{ \Illuminate\Support\Str::headline($member->name) }}
                    <br/>
                    {{ \Illuminate\Support\Str::headline($member->address) }}
                    <br/>
                    {{ \Illuminate\Support\Str::headline($member->dob) }}
                </td>
                <td>
                    Spouse Details
                    <br/>
                    {{ \Illuminate\Support\Str::headline($member->spouse->name) }}
                    <br/>
                    {{ \Illuminate\Support\Str::headline($member->spouse->address) }}
                    <br/>
                    {{ \Illuminate\Support\Str::headline($member->spouse->dob) }}
                </td>
            </tr>
        </tbody
    </table
    <div class="page-break"></div>
@endforeach