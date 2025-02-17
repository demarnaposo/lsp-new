<x-guest-layout>


    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


    <form method="POST" action="{{ route('register') }}">
        @csrf


        <div>
            <x-input-label for="no_ktp" :value="__('Nomor KTP/NIK')" />
            <x-text-input id="no_ktp" class="block mt-1 w-full" type="number" name="no_ktp" :value="old('no_ktp')" />
            <x-input-error :messages="$errors->get('no_ktp')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Nomor HP')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="address" :value="__('Alamat')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="province_id" :value="__('Provinsi')" />
            <select id="province" name="province_id" class="select2 w-full">
                <option value="">Pilih Provinsi</option>
                @foreach ($provinces as $province)
                    <option value="{{ $province->id }}">{{ $province->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('province_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="regency_id" :value="__('Kota/Kabupaten')" />
            <select id="regency" name="regency_id" class="select2 w-full">
                <option value="">Pilih Kota/Kabupaten</option>
            </select>
            <x-input-error :messages="$errors->get('regency_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="district_id" :value="__('Kecamatan')" />
            <select id="district" name="district_id" class="select2 w-full">
                <option value="">Pilih Kecamatan</option>
            </select>
            <x-input-error :messages="$errors->get('district_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="sub_district_id" :value="__('Kelurahan')" />
            <select id="sub_district" name="sub_district_id" class="select2 w-full">
                <option value="">Pilih Kelurahan</option>
            </select>
            <x-input-error :messages="$errors->get('sub_district_id')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>


        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Konfirmasi Kata Sandi')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Sudah terdaftar?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Daftar') }}
            </x-primary-button>
        </div>
    </form>

    <!-- jQuery (Required for Select2) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();

            $('#province').change(function() {
                let provinceId = $(this).val();
                $('#regency').html('<option value="">Loading...</option>');
                $.get('/regencies/' + provinceId, function(data) {
                    $('#regency').html('<option value="">Pilih Kota/Kabupaten</option>');
                    $.each(data, function(index, value) {
                        $('#regency').append('<option value="' + value.id + '">' + value
                            .name + '</option>');
                    });
                });
            });

            $('#regency').change(function() {
                let regencyId = $(this).val();
                $('#district').html('<option value="">Loading...</option>');
                $.get('/districts/' + regencyId, function(data) {
                    $('#district').html('<option value="">Pilih Kecamatan</option>');
                    $.each(data, function(index, value) {
                        $('#district').append('<option value="' + value.id + '">' + value
                            .name + '</option>');
                    });
                });
            });

            $('#district').change(function() {
                let districtId = $(this).val();
                $('#sub_district').html('<option value="">Loading...</option>');
                $.get('/sub-districts/' + districtId, function(data) {
                    $('#sub_district').html('<option value="">Pilih Kelurahan</option>');
                    $.each(data, function(index, value) {
                        $('#sub_district').append('<option value="' + value.id + '">' +
                            value.name + '</option>');
                    });
                });
            });
        });
    </script>

</x-guest-layout>
