@extends('layouts.app')

@section('title', 'Người dùng')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">Danh sách người dùng</h4>
                    </div>
                    <div>
                        {{-- @can('user_delete') --}}
                        <a href="#" id="deleteAllUserSelected" class="btn btn-danger add-list"><i
                                class="las la-trash"></i>Xóa lựa chọn</a>
                        {{-- @endcan
                        @can('user_create') --}}
                        <a href="{{ route('users.create') }}" class="btn btn-primary add-list"><i
                                class="las la-plus mr-3"></i>Thêm người dùng</a>
                        {{-- @endcan --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                    <table class="data-table table mb-0 tbl-server-info">
                        <thead class="bg-white text-uppercase">
                            <tr class="ligth ligth-data">
                                <th>
                                    <div class="checkbox d-inline-block">
                                        <input type="checkbox" class="checkbox-input" id="selectAll">
                                        <label for="selectAll" class="mb-0"></label>
                                    </div>
                                </th>
                                <th>STT</th>
                                <th>Mã người dùng</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                {{-- <th>Image</th> --}}
                                <th>Gender</th>
                                <th>Phone</th>
                                <th>Birthday</th>
                                {{-- <th>Vai trò</th> --}}
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="ligth-body">
                            @foreach ($user as $item)
                                <tr>
                                    <td>
                                        <div class="checkbox d-inline-block">
                                            <input type="checkbox" value="{{ $item->id }}" class="checkbox-input"
                                                name="ids">
                                            <label for="ids" class="mb-0"></label>
                                        </div>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user_code }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    {{-- <td>
                                            @foreach ($item->roles as $role)
                                                <span class="bg-warning">{{ $role->title }}</span>
                                            @endforeach
                                        </td> --}}
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            {{-- @can('user_show') --}}
                                            <button class="btn btn-success"><a data-toggle="tooltip" data-placement="top"
                                                    title="Xem chi tiết" data-original-title="View"
                                                    href="{{ route('users.show', ['user' => $item->id]) }}"><i
                                                        class="fa fa-eye mr-0"></i>SHOW</a></button>
                                            {{-- @endcan
                                            @can('user_edit') --}}
                                            <button class="btn btn-warning"> <a data-toggle="tooltip" data-placement="top"
                                                    title="Cập nhật" data-original-title="Edit"
                                                    href="{{ route('users.edit', ['user' => $item->id]) }}"><i
                                                        class="fa fa-pen mr-0"></i>EDIT</a></button>
                                            {{-- @endcan
                                            @can('user_delete') --}}
                                            <form action="{{ route('users.destroy', ['user' => $item->id]) }}"
                                                method="POST" id="cateForm{{ $item->id }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit"
                                                    onclick="return confirm('Có chắc xóa không?')"><i
                                                        class="fa fa-trash-alt mr-0"></i>DELETE</button>
                                            </form>
                                            {{-- @endcan --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection

    @push('scripts')
        @can('user_delete')
            <script>
                $(document).ready(function() {

                    $("#selectAll").click(function() {
                        $("input[type=checkbox]").prop('checked', $(this).prop('checked'));
                    });

                    $("#deleteAllUserSelected").on("click", function() {
                        var ids = [];
                        $.each($("input[name='ids']:checked"), function() {
                            ids.push($(this).val());
                        });

                        $.ajax({
                            type: "DELETE",
                            url: 'users/massDestroy',
                            data: {
                                ids: ids,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            dataType: "json",
                            success: function(response) {
                                location.reload();
                            }
                        });
                    });

                });
            </script>
        @endcan
    @endpush
