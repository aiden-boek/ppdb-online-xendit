(function($) {
    var form = $("#signup-form");

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous: 'Previous',
            next: 'Next',
            finish: 'Submit',
            current: ''
        },
        titleTemplate: '<h3 class="title">#title#</h3>',
        onStepChanging: function (event, currentIndex, newIndex) {
            // Add form validation logic here
            return form.valid();
        },
        onFinished: function(event, currentIndex) {
            // Handle form submission here
            form.submit();
        }
    });

    // Initialize form validation
    form.validate({
        rules: {
            nama: 'required',
            no_telp: {
                required: true,
                digits: true, // Allow only digits
            },
            agama: 'required',
            tanggal_lahir: 'required',
            tempat_lahir: 'required',
            asal_sekolah: 'required',
            alamat: 'required',
            jenis_kelamin: 'required',
            ijazah: 'required',
            kk: 'required',
            nama_ayah: 'required',
            id_pekerjaan_ayah: 'required',
            nama_ibu: 'required',
            id_pekerjaan_ibu: 'required',
        },
        messages: {
            ijasah: {
                required: "Silakan unggah file ijasah Anda",
            },
            kk: {
                required: "Silakan unggah file Kartu Keluarga (KK) Anda",
            },
            nama_ayah: {
                required: "Silakan masukkan nama ayah Anda",
            },
            id_pekerjaan_ayah: {
                required: "Silakan pilih pekerjaan ayah Anda",
            },
            nama_ibu: {
                required: "Silakan masukkan nama ibu Anda",
            },
            id_pekerjaan_ibu: {
                required: "Silakan pilih pekerjaan ibu Anda",
            },
            no_telp_ortu: {
                required: "Silakan masukkan nomor telepon orang tua Anda",
                number: "Silakan masukkan nomor telepon yang valid",
            },
        }
    });

})(jQuery);
