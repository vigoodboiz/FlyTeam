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
                        @can('user_delete')
                            <a href="#" id="deleteAllUserSelected" class="btn btn-danger add-list"><i
                                    class="las la-trash"></i>Xóa lựa chọn</a>
                        @endcan
                        @can('user_create')
                            <a href="{{ route('users.create') }}" class="btn btn-primary add-list"><i
                                    class="las la-plus mr-3"></i>Thêm người dùng</a>
                        @endcan
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
                                <th>Id</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Gender</th>
                                <th>SDT</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Action</th>
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
                                    @if (!empty($item->profile_picture))
                                        <td><img src="{{ asset('storage/' . $item->profile_picture) }}"
                                                class="rounded-circle" alt="Profile Picture"></td>
                                    @else{
                                        <td>
                                            <p>No images!</p>
                                        </td>
                                        }
                                    @endif
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>
                                        <span class="bg-primary">{{ $item->roles->title }}</span>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center list-action">
                                            @can('user_show')
                                                <button class="btn btn-warning"><a data-toggle="tooltip" data-placement="top"
                                                        title="Xem chi tiết" data-original-title="View"
                                                        href="{{ route('users.show', ['user' => $item->id]) }}"><i
                                                            class="fa fa-eye mr-0"></i></a></button>
                                            @endcan
                                            @can('user_edit')
                                                <button class="btn btn-info"> <a data-toggle="tooltip" data-placement="top"
                                                        title="Cập nhật" data-original-title="Edit"
                                                        href="{{ route('users.edit', ['user' => $item->id]) }}"><i
                                                            class="fa-solid fa-pen"></i></a></button>
                                            @endcan
                                            @can('user_delete')
                                                <form id="delete-form"
                                                    action="{{ route('users.destroy', ['user' => $item->id]) }}" method="POST"
                                                    id="cateForm{{ $item->id }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger" type="submit" id="delete-button"><i
                                                            class="fa fa-trash mr-0"></i></button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $user->links() }}
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
                        })
                    })

                })
            </script>
        @endcan
    @endpush
