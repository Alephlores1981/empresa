<?php echo $this->extend('plantilla'); ?>
<?=$this->section('contenido'); ?>

<h3 class="my-3" id="titulo">Empleados</h3>

            <a href="<?= base_url('empleados/new'); ?>" class="btn btn-success">Agregar</a>

            <table class="table table-hover table-bordered my-3" aria-describedby="titulo">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Clave</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                  <?php foreach ($empleados as $empleado) : ?>
                    <tr>
                      <td><?= $empleado['clave'];?></td>
                      <td><?= $empleado['nombre'];?></td>
                      <td><?= $empleado['telefono'];?></td>
                      <td><?= $empleado['email'];?></td>
                      <td><?= $empleado['id_departamento'];?></td>
                      <td>
                      <a href="<?= base_url('empleados/' .$empleado['id'] .'/edit' );?>" class="btn btn-warning btn-sm me-2">Editar</a>  
                      </td>
                    </tr>
                    <?php endforeach;  ?>
                    <!--<tr>
                        <td>12345</td>
                        <td>JUAN PEREZ</td>
                        <td>0123456789</td>
                        <td>JUANPEREZ@DOMINIO.COM</td>
                        <td>RECURSOS HUMANOS</td>
                        <td>
                            <a href="edita.html" class="btn btn-warning btn-sm me-2">Editar</a>

                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#eliminaModal" data-bs-id="1">Eliminar</button>
                        </td>
                    </tr>-->

                </tbody>
            </table>



<?=$this-> endSection(); ?>