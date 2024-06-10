<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
        var botao = document.getElementById("tema_botao");
        var corpo = document.documentElement;

        function trocarTema() {
            var tema = corpo.getAttribute("data-bs-theme");

            if (tema === 'light') {
                corpo.setAttribute("data-bs-theme", "dark");
                botao.setAttribute("class","btn btn-dark");
                botao.innerText = "Light";
            } else {
                corpo.setAttribute("data-bs-theme", "light");
                botao.setAttribute("class","btn btn-light");
                botao.innerText = "DarkMode";
            }
        }

        botao.addEventListener("click", trocarTema);
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));

    // Mostrar a modal de erro
    errorModal.show();

    // Desabilitar todos os elementos interativos na página
    var elementosInterativos = document.querySelectorAll('button, a, input, select, textarea, nav');
    elementosInterativos.forEach(function(elemento) {
        elemento.disabled = true;
    });
});
</script>
