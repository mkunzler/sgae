$(document).ready( function () {

    var i = 0;

    $("#add").on("click", function () {
        if (i==0) $("#remove").show();
        ++i;
        $(`#div-subjects`).append(
            $(`
            <div class="row" id="div-${i}">
                <div class="form-group col-md-6">
                    <label for="name_${i}">Nome: *</label>
                    <input type="text" class="form-control" id="name_${i}" name="subjects[${i}][name]" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="course_id_${i}">Curso: *</label>
                    <select class="form-control" id="course_id_${i}" name="subjects[${i}][course_id]" required readonly="readonly" tabindex="-1" aria-disabled="true">
                    </select>
                </div>
            </div>`)
        );
        searchCourses(i);
    })

    $("#remove").on("click", function () {
        $(`#div-${i}`).remove();
        --i;
        if (i==0) $("#remove").hide();
    });

    function searchCourses(num) {
        let course_id = $("#hidden-course").val();
        axios.get('/subjects/fetch/courses')
        .then(response => {
            options = '';
            $.each(response.data, function (i, value) {
                options += `<option value="${value.id}" ${ value.id==course_id ? ' selected="selected"' : '' }>${value.name}</option>`
            })
            $(`#course_id_${num}`).html(options);
        })
        .catch(error => {
            console.log(error);
        });
    }

});
