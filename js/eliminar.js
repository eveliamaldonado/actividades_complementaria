function delete_estudiante(id_to_delete){
            var confirmation=confirm("Desea borrar el estudiante por numero de control  " + id_to_delete);

            if (confirmation) {
                window.location="delete_estudiante.php?No_contro=" + id_to_delete;
            }
        }
function delete_carrera(id_to_delete){
            var confirmation=confirm("Desea borrar la carrera por la clave  " + id_to_delete);

            if (confirmation) {
                window.location="delete_carrera.php?clave_carrera=" + id_to_delete;
            }
        }

function delete_trabajador(id_to_delete){
            var confirmation=confirm("Desea borrar el trabajador por rfc " + id_to_delete);

            if (confirmation) {
                window.location="delete_trabajador.php?rfc=" + id_to_delete;
            }
        }

function delete_instituto(id_to_delete){
            var confirmation=confirm("Desea borrar el instituto por clave " + id_to_delete);

            if (confirmation) {
                window.location="delete_instituto.php?clave_instituto=" + id_to_delete;
            }
        }

function delete_departamento(id_to_delete){
            var confirmation=confirm("Desea borrar el departamento por clave " + id_to_delete);

            if (confirmation) {
                window.location="delete_departamento.php?Clave_depa=" + id_to_delete;
            }
        }

function delete_instructor(id_to_delete){
            var confirmation=confirm("Desea borrar el instructor" + id_to_delete);

            if (confirmation) {
                window.location="delete_instructor.php?rfc_instructor=" + id_to_delete;
            }
        }

function delete_actividad(id_to_delete){
            var confirmation=confirm("Desea borrar la actividad" + id_to_delete);

            if (confirmation) {
                window.location="delete_actividad.php?clave_act=" + id_to_delete;
            }
        } 