<?= $this->extend('admin/template/layout');
$this->section('title') ?> Estudiantes <?= $this->endSection();
?>

<?= $this->section('content'); ?>
<div class="d-grid gap-2 d-md-flex justify-content-sm-end">
    <a href="<?= base_url('admin/') ?>" class="btn btn-outline-secondary float-right mb-3"><i
            class="fa fa-arrow-left"></i> Regresar</a>
</div>

<div class="">
    <div class="row">
        <div class="col-xl-12">
            <?php
            if (session()->getFlashdata('success')):?>
                <div class="alert alert-success alert-dismissible" id="success-alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?php echo session()->getFlashdata('success') ?>
                </div>
            <?php elseif (session()->getFlashdata('failed')): ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert">&times;</button>
                    <?php echo session()->getFlashdata('failed') ?>
                </div>
            <?php endif; ?>

            <div class="card">

                <div class="card-header">
                    <h5 class="card-title">Estudiantes</h5>
                    <a href="<?= base_url('admin/usuarios/new') ?>" class="btn btn-primary float-right">Nuevo
                        usuario</a>
                </div>

                <div class="card-body">
                    <table id="example" class="table">
                        <thead>
                        <tr>
                            <th>MATRÍCULA</th>
                            <th>PERFIL</th>
                            <th>NOMBRE</th>
                            <th>CORREO ELECTRÓNICO</th>
                            <th>SEXO</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($usuarios) > 0):
                            foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td><?= $usuario['codigo'] ?> </td>
                                    <td>
                                        <?php if ($usuario['rol'] == 'admin') : ?>
                                            <p class="text-uppercase badge bg-danger"><?= $usuario['rol'] ?></p>
                                        <?php elseif ($usuario['rol'] == 'docente') : ?>
                                            <p class="text-uppercase badge bg-primary"><?= $usuario['rol'] ?></p>
                                        <?php else : ?>
                                            <p class="text-uppercase badge bg-secondary"><?= $usuario['rol'] ?></p>
                                        <?php endif; ?>
                                    </td>

                                    <td><?= $usuario['nombre'] ?> <?= $usuario['apaterno'] ?> <?= $usuario['amaterno'] ?> </td>
                                    <td><?= $usuario['email'] ?></td>
                                    <td><?= $usuario['sexo'] ?></td>
                                    <td class="d-flex">
                                        <a href="<?= base_url('admin/estudiantes/' . $usuario['id']) ?>"
                                           class="btn btn-sm btn-info mx-1" title="Ver"><i
                                                class="bi bi-info-square"></i></a>
                                        <a href="<?= base_url('admin/estudiantes/' . $usuario['id'] . '/edit') ?>"
                                           class="btn btn-sm btn-success mx-1" title="Editar"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form class="display-none" method="post"
                                              action="<?= base_url('admin/estudiantes/' . $usuario['id']) ?>"
                                              id="usuarioDeleteForm<?= $usuario['id'] ?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <a href="javascript:void(0)"
                                               onclick="deleteUsuario('usuarioDeleteForm<?= $usuario['id'] ?>')"
                                               class="btn btn-sm btn-danger" title="Eliminar"><i
                                                    class="bi bi-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="4">
                                    <h6 class="text-danger text-center">No hay información de usuarios registrados</h6>
                                </td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>MATRÍCULA</th>
                            <th>PERFIL</th>
                            <th>NOMBRE</th>
                            <th>CORREO ELECTRÓNICO</th>
                            <th>SEXO</th>
                            <th>ACCIONES</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function deleteUsuario(formId) {
        var confirm = window.confirm('¿Desea eliminar al estudiante seleccionado? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->include('admin/template/datatables'); ?>
<?= $this->endSection(); ?>
