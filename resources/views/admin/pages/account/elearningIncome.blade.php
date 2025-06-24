@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Job Portal</a></li>
                        <li class="breadcrumb-item active">E-Learning Income!</li>
                    </ol>
                </div>
                <h4 class="page-title">E-Learning Income!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button style="background-color:darkblue;" class="btn text-nowrap text-light"
                        onclick="exportTableToPDF('e-learning-income-report.pdf', 'Expense Report')">
                    Download Report
                </button>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Type</th>
                        <th>User</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($elearningIncome as $key=>$elearningIncomeData)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$elearningIncomeData->eLearning->title}}</td>
                            <td>{{$elearningIncomeData->user->name}}</td>
                            <td>{{$elearningIncomeData->price}}</td>
                            <td>{{\Carbon\Carbon::parse($elearningIncomeData->date)->format('d M Y')}}</td>
                            <td>{{$elearningIncomeData->payment_status}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex">
                                    @can('elearning-income-delete')
                                        <a href="{{route('elearning.income.destroy',$elearningIncomeData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$elearningIncomeData->id}}">Delete</a>
                                    @endcan
                                </div>
                            </td>
                            <!-- Delete Modal -->
                            <div id="danger-header-modal{{$elearningIncomeData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$elearningIncomeData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$elearningIncomeData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('elearning.income.destroy',$elearningIncomeData->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <script>
        function exportTableToPDF(filename, heading) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.text(heading, doc.internal.pageSize.getWidth() / 2, 20, { align: 'center' });
            let rows = document.querySelectorAll("table tr");
            let data = [];
            for (let i = 0; i < rows.length; i++) {
                let row = [],
                    cols = rows[i].querySelectorAll("td, th");
                for (let j = 0; j < cols.length - 1; j++)  // <- Fixed here
                    row.push(cols[j].innerText);
                data.push(row);
            }
            doc.autoTable({
                head: [data[0]],
                body: data.slice(1),
                startY: 30
            });
            doc.save(filename);
        }
    </script>
@endsection
