

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Daftar Mahasiswa</h1>

    <a href="<?php echo e(route('mahasiswa.create')); ?>" class="btn btn-primary mb-3">Tambah Mahasiswa</a>
    
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <form action="<?php echo e(route('mahasiswa.index')); ?>" method="GET" class="mb-3 d-flex align-items-center">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari mahasiswa..." value="<?php echo e(request('search')); ?>">
        
        <select name="sort_by" class="form-select me-2">
            <option value="nama" <?php echo e(request('sort_by') == 'nama' ? 'selected' : ''); ?>>Sortir berdasarkan Nama</option>
            <option value="nrp" <?php echo e(request('sort_by') == 'nrp' ? 'selected' : ''); ?>>Sortir berdasarkan NRP</option>
            <option value="jurusan" <?php echo e(request('sort_by') == 'jurusan' ? 'selected' : ''); ?>>Sortir berdasarkan Jurusan</option>
        </select>
        
        <button type="submit" class="btn btn-primary">Cari & Sortir</button>
    </form>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NRP</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $mahasiswas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $mahasiswa): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($key + 1); ?></td>
                    <td><?php echo e($mahasiswa->nama); ?></td>
                    <td><?php echo e($mahasiswa->nrp); ?></td>
                    <td><?php echo e($mahasiswa->jurusan); ?></td>
                    <td>
                        <a href="<?php echo e(route('mahasiswa.show', $mahasiswa->id)); ?>" class="btn btn-info">Detail</a>
                        <a href="<?php echo e(route('mahasiswa.edit', $mahasiswa->id)); ?>" class="btn btn-warning">Edit</a>
                        <form action="<?php echo e(route('mahasiswa.destroy', $mahasiswa->id)); ?>" method="POST" style="display:inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HeiSQL\php\simplecrud\resources\views/mahasiswa/index.blade.php ENDPATH**/ ?>