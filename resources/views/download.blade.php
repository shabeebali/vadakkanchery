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
                <td class="center py">{{$member->name}} - {{$member->spouse->name}}</td>
            </tr>
        </tbody
    </table
    <div class="page-break"></div>
@endforeach