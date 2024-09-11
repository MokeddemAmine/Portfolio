@extends('admin.layouts.app')
@section('title','dashboard task')
    
@section('content')
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>Task List</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Pages
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Task
                                                    List</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- start task list contant -->
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card card-statistics task-list-contant">
                                    <div class="card-body table-responsive p-0">
                                        <table class="table task-table mb-0">
                                            <thead class="border-bottom">
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                                            <label class="form-check-label" for="checkAll">
                                                                <span class="font-weight-bold">All
                                                                    Task</span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">Progress</span>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">Priority</span>
                                                    </td>
                                                    <td>
                                                        <span class="font-weight-bold">Comments</span>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn font-20" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fa fa-gear"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right custom-dropdown p-4">
                                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                                        class="ti ti-pencil pr-2 text-primary"></i>
                                                                    Rename</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                                        class="ti ti-announcement pr-2 text-info"></i>
                                                                    Mark as Unread</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                                        class="ti ti-close pr-2 text-warning"></i>
                                                                    Close</a>
                                                                <a class="dropdown-item" href="javascript:void(0)"><i
                                                                        class="ti ti-trash pr-2 text-danger"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>

                                                </tr>
                                            </thead>
                                            <tbody class="text-muted mb-0">
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check">
                                                            <label class="form-check-label" for="Check">Change scss to less</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 99%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-success"></a><span>High
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-success">25</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-success">Completed</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check1">
                                                            <label class="form-check-label" for="Check1">Update all plugins</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 65%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-warning"></a><span>Medium
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-warning ">35</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-warning">In Progress</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check2">
                                                            <label class="form-check-label" for="Check2">Create new intro page</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 35%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-primary"></a><span>Low
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-primary">8</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-primary">On hold</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check3">
                                                            <label class="form-check-label" for="Check3">Update sidebar links</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-warning"></a><span>Medium
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-warning">10</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-warning">In Progress</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check4">
                                                            <label class="form-check-label" for="Check4">Update color styles</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 60%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-success"></a><span>High
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-success">14</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-success">In Progress</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check5">
                                                            <label class="form-check-label" for="Check5">Add new cards page</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 30%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-primary"></a><span>Low
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-primary">24</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-primary">On hold</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check6">
                                                            <label class="form-check-label" for="Check6">Add new charts</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 95%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-success"></a><span>High
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-success">4</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-success">Completed</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check7">
                                                            <label class="form-check-label" for="Check7">Update google fonts</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 55%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-warning"></a><span>Medium
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-warning">22</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-warning">In Progress</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check8">
                                                            <label class="form-check-label" for="Check8">Change font style</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 97%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-primary"></a><span>Low
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-primary">5</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-primary">Completed</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check9">
                                                            <label class="form-check-label" for="Check9">Change variable names</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-success"></a><span>High
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-success">18</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-success">Completed</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value="" id="Check10">
                                                            <label class="form-check-label" for="Check10">Update package.json</label>
                                                        </div>
                                                    </td>
                                                    <td class="w-30">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: 75%"></div>
                                                        </div>
                                                    </td>
                                                    <td><a href="javascript:void(0)" class="dot bg-warning"></a><span>Medium
                                                            Priority</span></td>
                                                    <td class="task-table-td">
                                                        <div class="chat">
                                                            <i class="ti ti-comments"></i><span class="badge badge-warning">4</span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <p class="text-right text-warning">In Progress</p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end task list contant -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
@endsection