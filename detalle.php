<?php
require_once '../../includes/conexion.php';
require_once '../../includes/header.php';

$id = (int)($_GET['id'] ?? 1);
$stmt = $pdo->prepare("SELECT * FROM tema WHERE IdTema = ?");
$stmt->execute([$id]);
$tema = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$tema) {
    echo "<div class='container mt-5'><div class='alert alert-danger'>Tema no encontrado.</div></div>";
    require_once '../../includes/footer.php';
    exit;
}
?>

<div class="container mt-4 mb-5" style="max-width: 900px;">
    <a href="index.php" class="btn btn-sm btn-outline-secondary mb-4">&larr; Volver a Unidades</a>

    <div class="card shadow-sm border-0 mb-4 bg-primary text-white">
        <div class="card-body p-4 p-md-5">
            <span class="badge bg-light text-primary mb-2 fs-6"><?php echo htmlspecialchars($tema['Unidad']); ?></span>
            <h1 class="fw-bold mb-0"><?php echo htmlspecialchars($tema['NombreTema']); ?></h1>
        </div>
    </div>

    <div class="card shadow-sm border-0 mb-5">
        <div class="card-body p-4 p-md-5 fs-5 text-dark">
            <?php echo $tema['Descripcion']; ?>
        </div>
    </div>

    <h4 class="text-secondary fw-bold mb-4">Ejercicios Resueltos de este tema</h4>
    
    <div class="bg-white p-4 rounded-3 shadow-sm border border-success border-opacity-25">
        <?php if ($id === 1): // ARREGLOS ?>
            <ul class="nav nav-tabs" id="ejercicioTabs" role="tablist">
                <li class="nav-item" role="presentation"><button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#cpp" type="button" role="tab">C++</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#java" type="button" role="tab">Java</button></li>
            </ul>
            <div class="tab-content pt-3" id="ejercicioTabsContent">
                <div class="tab-pane fade show active" id="cpp" role="tabpanel">
                    <p><strong>Problema:</strong> Declarar un arreglo de 5 enteros, asignarle valores y calcular la suma total.</p>
                    <pre><code>#include &lt;iostream&gt;
using namespace std;

int main() {
    int numeros[5] = {10, 20, 30, 40, 50};
    int suma = 0;
    for(int i = 0; i &lt; 5; i++) { suma += numeros[i]; }
    cout &lt;&lt; "La suma es: " &lt;&lt; suma;
    return 0;
}</code></pre>
                </div>
                <div class="tab-pane fade" id="java" role="tabpanel">
                    <p><strong>Problema:</strong> Declarar un arreglo de 5 enteros, asignarle valores y calcular la suma total.</p>
                    <pre><code>public class SumaArreglo {
    public static void main(String[] args) {
        int[] numeros = {10, 20, 30, 40, 50};
        int suma = 0;
        for(int i = 0; i &lt; numeros.length; i++) { suma += numeros[i]; }
        System.out.println("La suma es: " + suma);
    }
}</code></pre>
                </div>
            </div>

        <?php elseif ($id === 2): // POO ?>
            <ul class="nav nav-tabs" id="ejercicioTabs" role="tablist">
                <li class="nav-item" role="presentation"><button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#cpp" type="button" role="tab">C++</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#java" type="button" role="tab">Java</button></li>
            </ul>
            <div class="tab-content pt-3">
                <div class="tab-pane fade show active" id="cpp" role="tabpanel">
                    <p><strong>Problema:</strong> Crear una clase Persona con un método para saludar.</p>
                    <pre><code>#include &lt;iostream&gt;
using namespace std;

class Persona {
public:
    string nombre;
    void saludar() { cout &lt;&lt; "Hola, soy " &lt;&lt; nombre; }
};

int main() {
    Persona p;
    p.nombre = "Juan";
    p.saludar();
    return 0;
}</code></pre>
                </div>
                <div class="tab-pane fade" id="java" role="tabpanel">
                    <p><strong>Problema:</strong> Crear una clase Persona con un método para saludar.</p>
                    <pre><code>class Persona {
    String nombre;
    void saludar() { System.out.println("Hola, soy " + nombre); }
}

public class Main {
    public static void main(String[] args) {
        Persona p = new Persona();
        p.nombre = "Juan";
        p.saludar();
    }
}</code></pre>
                </div>
            </div>

        <?php elseif ($id === 3): // ARCHIVOS ?>
            <ul class="nav nav-tabs" id="ejercicioTabs" role="tablist">
                <li class="nav-item" role="presentation"><button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#cpp" type="button" role="tab">C++</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#java" type="button" role="tab">Java</button></li>
            </ul>
            <div class="tab-content pt-3">
                <div class="tab-pane fade show active" id="cpp" role="tabpanel">
                    <p><strong>Problema:</strong> Escribir texto en un archivo llamado datos.txt.</p>
                    <pre><code>#include &lt;fstream&gt;
using namespace std;

int main() {
    ofstream archivo("datos.txt");
    archivo &lt;&lt; "Escribiendo desde C++";
    archivo.close();
    return 0;
}</code></pre>
                </div>
                <div class="tab-pane fade" id="java" role="tabpanel">
                    <p><strong>Problema:</strong> Escribir texto en un archivo llamado datos.txt.</p>
                    <pre><code>import java.io.FileWriter;

public class Archivos {
    public static void main(String[] args) throws Exception {
        FileWriter escritor = new FileWriter("datos.txt");
        escritor.write("Escribiendo desde Java");
        escritor.close();
    }
}</code></pre>
                </div>
            </div>
            
        <?php elseif ($id === 4): // LINKEDLIST ?>
            <ul class="nav nav-tabs" id="ejercicioTabs" role="tablist">
                <li class="nav-item" role="presentation"><button class="nav-link active fw-bold" data-bs-toggle="tab" data-bs-target="#cpp" type="button" role="tab">C++</button></li>
                <li class="nav-item" role="presentation"><button class="nav-link fw-bold" data-bs-toggle="tab" data-bs-target="#java" type="button" role="tab">Java</button></li>
            </ul>
            <div class="tab-content pt-3">
                <div class="tab-pane fade show active" id="cpp" role="tabpanel">
                    <p><strong>Problema:</strong> Implementar una lista nativa utilizando la librería estándar.</p>
                    <pre><code>#include &lt;iostream&gt;
#include &lt;list&gt;
using namespace std;

int main() {
    list&lt;int&gt; miLista = {10, 20, 30};
    miLista.push_back(40);
    return 0;
}</code></pre>
                </div>
                <div class="tab-pane fade" id="java" role="tabpanel">
                    <p><strong>Problema:</strong> Implementar LinkedList usando java.util.</p>
                    <pre><code>import java.util.LinkedList;

public class Listas {
    public static void main(String[] args) {
        LinkedList&lt;Integer&gt; miLista = new LinkedList&lt;&gt;();
        miLista.add(10);
        miLista.add(20);
        miLista.add(40);
    }
}</code></pre>
                </div>
            </div>
        <?php else: ?>
             <div class="alert alert-info">Aún no hay ejercicios resueltos para esta unidad.</div>
        <?php endif; ?>
    </div>

    <div class="mt-5 text-center bg-light p-4 p-md-5 rounded-4 shadow-sm border border-2 border-primary border-opacity-25">
        <h3 class="fw-bold text-dark mb-3">¿Listo para el desafío?</h3>
        <p class="text-muted fs-5 mb-4">Demuestra tu lógica ordenando el código de los algoritmos en nuestro entorno interactivo.</p>
        <a href="<?php echo BASE_URL; ?>modulos/ejercicios/index.php" class="btn btn-primary btn-lg shadow px-5 py-3 rounded-pill fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-controller me-2" viewBox="0 0 16 16">
                <path d="M11.5 6.027a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm2.5-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm-1.5 1.5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1zm-6.5-3h1v1h1v1h-1v1h-1v-1h-1v-1h1v-1z"/>
                <path d="M3.051 3.26a.5.5 0 0 1 .354-.613l1.932-.518a.5.5 0 0 1 .62.39c.655-.079 1.35-.117 2.043-.117.72 0 1.443.041 2.12.126a.5.5 0 0 1 .622-.399l1.932.518a.5.5 0 0 1 .306.729c.14.09.266.19.373.297l.028.028c.281.28.505.628.64 1.006l.415 1.149c.16.443.24 1.23.24 2.133 0 1.597-.872 2.807-1.144 3.06l-.01.01-.02.01-1.336 1.155a.5.5 0 0 1-.368.14H4.379a.5.5 0 0 1-.368-.14L2.675 11.23l-.02-.01-.01-.01c-.272-.253-1.144-1.463-1.144-3.06 0-.902.08-1.69.24-2.132l.415-1.15c.136-.378.36-.726.64-1.006l.028-.028c.107-.107.233-.207.373-.297zM3.256 4.467a7.58 7.58 0 0 0-.223.216c-.2.2-.366.477-.455.72l-.415 1.15c-.128.355-.192 1.05-.192 1.947 0 1.14-.54 2.128-.84 2.415l1.09 1.194h7.978l1.09-1.194c-.3-.287-.84-1.274-.84-2.415 0-.897-.064-1.592-.192-1.947l-.415-1.15a1.51 1.51 0 0 0-.455-.72l-.022-.022a7.58 7.58 0 0 0-.223-.216l-2.062-.553a.5.5 0 0 1-.358-.51 1.5 1.5 0 0 0-.22-.676c-.604-.15-1.265-.226-1.954-.226-.69 0-1.35.076-1.954.226a1.5 1.5 0 0 0-.22.676.5.5 0 0 1-.358.51l-2.062.553z"/>
            </svg>
            Ir al Laboratorio de Prácticas
        </a>
    </div>

</div> <style>
/* Estilo pulido para el bloque de código interactivo */
.tab-content pre {
    background-color: #212529;
    color: #f8f9fa;
    padding: 1.2rem;
    border-radius: 0.5rem;
    font-size: 1.05rem;
    margin-bottom: 0;
    box-shadow: inset 0 0 10px rgba(0,0,0,0.5);
}
.nav-tabs .nav-link {
    color: #6c757d;
    border: none;
    border-bottom: 3px solid transparent;
}
.nav-tabs .nav-link.active {
    color: #198754;
    background-color: transparent;
    border-bottom: 3px solid #198754;
}
.nav-tabs .nav-link:hover:not(.active) {
    border-bottom: 3px solid #dee2e6;
}
</style>

<?php require_once '../../includes/footer.php'; ?>