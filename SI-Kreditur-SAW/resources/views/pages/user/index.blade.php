@extends('layout')
@section('content')
    <div class="animated">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <strong id="form-title">User Create</strong> Form
                    </div>
                    <form id="user-form" action="{{ route('user.store') }}" method="post" class="">
                        @csrf
                        <div class="card-body card-block">
                            <input type="hidden" id="user-id" name="id">
                            <div class="form-group">
                                <label for="nf-email" class="form-control-label">Email</label>
                                <input type="email" id="nf-email" name="email" placeholder="Enter Email.."
                                    class="form-control">
                                <span class="help-block">Please enter your email</span>
                            </div>
                            <div class="form-group">
                                <label for="nf-password" class="form-control-label">Password</label>
                                <input type="password" id="nf-password" name="password" placeholder="Enter Password.."
                                    class="form-control">
                                <span class="help-block">Please enter your password</span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-sm">
                                <h4 class="card-title">Management User</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $items)
                                    <tr>
                                        <td>{{ $items->karyawans?->nama_karyawan }}</td>
                                        <td>{{ $items->email }}</td>
                                        <td>{{ $items->password }}</td>
                                        <td>
                                            <a href="#" class="text-secondary font-weight-bold text-md edit-user"
                                                data-toggle="tooltip" data-original-title="Edit user"
                                                data-id="{{ $items->id }}" data-email="{{ $items->email }}">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                            <a href="{{ route('user.destroy', ['id' => $items->id]) }}"
                                                class="text-secondary font-weight-bold text-md" data-toggle="tooltip"
                                                data-original-title="Delete user" data-confirm-delete="true">
                                                <i class="menu-icon fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('user-form');
            const formTitle = document.getElementById('form-title');
            const userIdInput = document.getElementById('user-id');
            const emailInput = document.getElementById('nf-email');
            const passwordInput = document.getElementById('nf-password');

            document.querySelectorAll('.edit-user').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const userId = this.getAttribute('data-id');
                    const email = this.getAttribute('data-email');
                    const password = ''; // Do not pre-fill password for security reasons

                    form.action = `/user/${userId}`;
                    form.method = 'POST';

                    // Add hidden input for PUT method
                    if (!document.querySelector('input[name="_method"]')) {
                        const methodInput = document.createElement('input');
                        methodInput.setAttribute('type', 'hidden');
                        methodInput.setAttribute('name', '_method');
                        methodInput.setAttribute('value', 'PUT');
                        form.appendChild(methodInput);
                    } else {
                        document.querySelector('input[name="_method"]').value = 'PUT';
                    }

                    userIdInput.value = userId;
                    emailInput.value = email;
                    passwordInput.value = password;

                    formTitle.textContent = 'Edit User';
                    form.querySelector('button[type="submit"]').innerHTML =
                        '<i class="fa fa-dot-circle-o"></i> Update';
                });
            });
        });
    </script>
@endsection
