<?= $this->extend('admin/template/layout');

$this->section('title') ?> Periodos escolares <?= $this->endSection();

$this->section('encabezado') ?><p class="text-uppercase">Periodos escolares</p><?= $this->endSection();

?>



<?= $this->section('content'); ?>

<div class="">
    <div class="row py-4">
        <div class="col-xl-12 text-end">
            <a href="<?= base_url('admin/') ?>" class="btn btn-default">Regresar</a>
        </div>
    </div>

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
                    <h5 class="card-title">Asignaturas</h5>
                    <a href="<?= base_url('admin/periodosescolares/new') ?>" class="btn btn-primary float-right">Nuevo periodo escolar</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>CÓDIGO</th>
                            <th>NOMBRE</th>
                            <th>TIPO</th>
                            <th>DURACIÓN</th>
                            <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if (count($periodosescolares) > 0):
                            foreach ($periodosescolares as $pe): ?>
                                <tr>
                                    <td><?= $pe['codigo']; ?></td>
                                    <td><?= $pe['nombre'] ?></td>
                                    <td><?= $pe['tipo'] ?> </td>
                                    <td>
                                        <p>Inicio: </p><?= $pe['fechaInicio'] ?>
                                        <p>Fin: </p><?= $pe['fechaFin'] ?>
                                    </td>
                                    <td class="d-flex">
                                        <a href="<?= base_url('admin/periodosescolares/' . $pe['id']) ?>"
                                           class="btn btn-sm btn-info mx-1" title="Ver"><i
                                                class="bi bi-info-square"></i></a>
                                        <a href="<?= base_url('admin/periodosescolares/' . $pe['id'] . '/edit') ?>"
                                           class="btn btn-sm btn-success mx-1" title="Editar"><i
                                                class="bi bi-pencil-square"></i></a>
                                        <form class="display-none" method="post"
                                              action="<?= base_url('admin/periodosescolares/' . $pe['id']) ?>"
                                              id="peDeleteForm<?= $pe['id'] ?>">
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <a href="javascript:void(0)"
                                               onclick="deletePE('peDeleteForm<?= $pe['id'] ?>')"
                                               class="btn btn-sm btn-danger" title="Eliminar"><i
                                                    class="bi bi-trash"></i></a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach;
                        else: ?>
                            <tr rowspan="1">
                                <td colspan="5">
                                    <h6 class="text-danger text-center">No hay información de periodos escolares registrados</h6>
                                </td>
                            </tr>
                        <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deletePE(formId) {
        var confirm = window.confirm('¿Desea eliminar el periodo escolar seleccionado? Esta acción es irreversible.');
        if (confirm == true) {
            document.getElementById(formId).submit();
        }
    }
</script>


<?= $this->endSection(); ?>
