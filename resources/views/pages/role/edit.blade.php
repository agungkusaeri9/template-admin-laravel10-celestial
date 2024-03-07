@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Edit Role</h4>
                    <form action="{{ route('roles.update', $item->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class='form-group mb-3'>
                            <label for='name' class='mb-2'>Nama</label>
                            <input type='text' name='name' class='form-control @error('name') is-invalid @enderror'
                                value='{{ $item->name ?? old('name') }}'>
                            @error('name')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <table class="table table-borderless permissionTable overflow-hidden my-4 p-4">
                            <th class="px-4">
                                Grup
                            </th>

                            <th class="px-4">
                                <label>
                                    <input class="grand_selectall" type="checkbox">
                                    Pilih Semua
                                </label>
                            </th>

                            <th class="px-4">
                                Permissions
                            </th>

                            <tbody>
                                @foreach ($permissions as $key => $group)
                                    <tr class="pr-2">
                                        <td class="text-left">
                                            <b>{{ ucfirst($key) }}</b>
                                        </td>
                                        <td class="text-left" width="20%">
                                            <label>
                                                <input class="selectall" type="checkbox">
                                                Pilih Semua
                                            </label>
                                        </td>
                                        <td class="pr-2">
                                            @forelse($group as $permission)
                                                <label class="pr-3">
                                                    <input name="permissions[]" class="permissioncheckbox"
                                                        class="rounded-md border" type="checkbox"
                                                        value="{{ $permission->name }}"
                                                        {{ in_array($permission->name, $item->permissions->pluck('name')->toArray()) ? 'checked' : '' }}>
                                                    {{ $permission->name }} &nbsp;&nbsp;
                                                </label>
                                            @empty
                                                {{ __('No permission in this group !') }}
                                            @endforelse
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="form-group text-right">
                            <a href="{{ route('roles.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Update Role</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            $(".permissionTable").on('click', '.selectall', function() {

                if ($(this).is(':checked')) {
                    $(this).closest('tr').find('[type=checkbox]').prop('checked', true);

                } else {
                    $(this).closest('tr').find('[type=checkbox]').prop('checked', false);

                }

                calcu_allchkbox();

            });

            $(".permissionTable").on('click', '.grand_selectall', function() {
                if ($(this).is(':checked')) {
                    $('.selectall').prop('checked', true);
                    $('.permissioncheckbox').prop('checked', true);
                } else {
                    $('.selectall').prop('checked', false);
                    $('.permissioncheckbox').prop('checked', false);
                }
            });

            $(function() {

                calcu_allchkbox();
                selectall();

            });

            function selectall() {

                $('.selectall').each(function(i) {

                    var allchecked = new Array();

                    $(this).closest('tr').find('.permissioncheckbox').each(function(index) {
                        if ($(this).is(":checked")) {
                            allchecked.push(1);
                        } else {
                            allchecked.push(0);
                        }
                    });

                    if ($.inArray(0, allchecked) != -1) {
                        $(this).prop('checked', false);
                    } else {
                        $(this).prop('checked', true);
                    }

                });
            }

            function calcu_allchkbox() {

                var allchecked = new Array();

                $('.selectall').each(function(i) {


                    $(this).closest('tr').find('.permissioncheckbox').each(function(index) {
                        if ($(this).is(":checked")) {
                            allchecked.push(1);
                        } else {
                            allchecked.push(0);
                        }
                    });


                });

                if ($.inArray(0, allchecked) != -1) {
                    $('.grand_selectall').prop('checked', false);
                } else {
                    $('.grand_selectall').prop('checked', true);
                }

            }



            $('.permissionTable').on('click', '.permissioncheckbox', function() {

                var allchecked = new Array;

                $(this).closest('tr').find('.permissioncheckbox').each(function(index) {
                    if ($(this).is(":checked")) {
                        allchecked.push(1);
                    } else {
                        allchecked.push(0);
                    }
                });

                if ($.inArray(0, allchecked) != -1) {
                    $(this).closest('tr').find('.selectall').prop('checked', false);
                } else {
                    $(this).closest('tr').find('.selectall').prop('checked', true);

                }

                calcu_allchkbox();

            });
        })
    </script>
@endpush
