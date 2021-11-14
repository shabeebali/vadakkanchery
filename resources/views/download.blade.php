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
                <td colspan="2" class="center py"><h4>Vadiyil Vadakkanchery Kudumba Samithi</h4></td>
            </tr>
            <tr>
                <td>
                    <h6>Member Details</h6>
                    <br/>
                    Name: {{ \Illuminate\Support\Str::headline($member->name) }}
                    <br/>
                    Address: {{ \Illuminate\Support\Str::headline($member->address) }}
                    <br/>
                    DOB: {{ $member->dob }}
                    <br>
                    Fathers' Name: {{\Illuminate\Support\Str::headline($member->parent->name)}}
                    <br/>
                    Mother's Name: {{\Illuminate\Support\Str::headline($member->parent->spouse->name)}}
                </td>
                <td>
                    Spouse Details
                    <br/>
                    Name: {{ \Illuminate\Support\Str::headline($member->spouse->name) }}
                    <br/>
                    Address: {{ \Illuminate\Support\Str::headline($member->spouse->address) }}
                    <br/>
                    DOB: {{ $member->spouse->dob }}
                    </br>
                    Fathers' Name: {{\Illuminate\Support\Str::headline($member->spouse->fathers_name)}}
                    <br/>
                    Mother's Name: {{\Illuminate\Support\Str::headline($member->spouse->mothers_name)}}
                </td>
            </tr>
        </tbody>
    </table>
    <table class="table fw">
        <tbody class="table">
            <tr>
                <td>Name</td>
                <td>DOB</td>
                <td>Blood Group</td>
                <td>Relation</td>
            </tr>
            @foreach($member->children as $child)
                <tr>
                    <td>{{ \Illuminate\Support\Str::headline($child->name)}}</td>
                    <td>{{$child->dob}}</td>
                    <td>{{$child->blood_group}}</td>
                    <td>{{$child->male ? 'Son' : 'Daughter'}}</td>
                </tr>
                @if ($child->married)
                    <tr>
                        <td>{{ \Illuminate\Support\Str::headline($child->spouse->name)}}</td>
                        <td>{{$child->spouse->dob}}</td>
                        <td>{{$child->spouse->blood_group}}</td>
                        <td>{{$child->spouse->male ? 'Son in Law' : 'Daughter in Law'}}</td>
                    </tr>
                    @foreach ($child->children as $grandChild)
                        <tr>
                            <td>{{ \Illuminate\Support\Str::headline($grandChild->name)}}</td>
                            <td>{{$grandChild->dob}}</td>
                            <td>{{$grandChild->blood_group}}</td>
                            <td>{{$grandChild->male ? 'Grand Son' : 'Grand Daughter'}}</td>
                        </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
    </table>
    <div class="page-break"></div>
@endforeach