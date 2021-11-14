<style>
.page-break {
    page-break-after: always;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
@foreach ($data as $member)
    <table class="table">
        <tbody class="table">
            <tr>
                <td>{{$member->name}} - {{$member->spouse->name}}</td>
            </tr>
        </tbody
    </table
    <div class="page-break"></div>
@endforeach