<style>
    .pdf-search .card {
        border: none;
        border-radius: 1.5rem;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
        background: #fff;
    }

    .pdf-search h2 {
        font-weight: 700;
        font-size: 1.75rem;
        color: #0d3f43;
    }

    .pdf-search .form-control {
        border-radius: 50px;
        padding: 14px 20px;
        font-size: 1rem;
        border: 1px solid #ccc;
        transition: all 0.3s ease-in-out;
    }

    .pdf-search .form-control:focus {
        border-color: #198f94;
        box-shadow: 0 0 10px rgba(25, 143, 148, 0.4);
    }

    .pdf-search .btn-primary {
        background: linear-gradient(135deg, #0f626a, #198f94, #0d3f43);
        border: none;
        border-radius: 50px;
        padding: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        transition: 0.3s ease-in-out;
    }

    .pdf-search .btn-primary:hover {
        opacity: 0.9;
        transform: scale(1.02);
    }

    .alert {
        border-radius: 1rem;
        font-size: 0.95rem;
    }

    .pdf-link {
        margin-top: 12px;
    }

    /* PDF iframe container */
    .pdf-viewer {
        margin-top: 20px;
        border: 3px solid #198f94;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25);
    }

    .pdf-viewer iframe {
        width: 100%;
        height: 500px;
        border: none;
    }
</style>

<div class="container pdf-search">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card p-4">
                <div class="card-body">
                    <h2 class="mb-4">🔎 Search in PDF</h2>
                    <!-- Search Form -->
                    <?= $this->Form->create(null, ['type' => 'get', 'class' => 'needs-validation']) ?>
                        <div class="mb-3">
                            <?= $this->Form->control('keyword', [
                                'label' => false,
                                'placeholder' => 'Enter keyword to search...',
                                'class' => 'form-control shadow-sm',
                                'required' => true
                            ]) ?>
                        </div>
                        <div class="d-grid">
                            <?= $this->Form->button('Search', [
                                'class' => 'btn btn-primary shadow-sm'
                            ]) ?>
                        </div>
                    <?= $this->Form->end() ?>
                    <!-- Results -->
                    <div class="mt-4">
                        <?php if (!empty($searchWord) && empty($results)): ?>
                            <div class="alert alert-danger text-center shadow-sm">
                                No matches found for <strong><?= h($searchWord) ?></strong>.
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($results)): ?>
                            <div class="alert alert-success text-center shadow-sm">
                                Found matches for <strong><?= h($searchWord) ?></strong>.  
                                <br> A PDF has been generated with the results.
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="pdf-viewer mt-3">
        <iframe src="<?= $this->Url->build('/files/medical_content_expanded.pdf') ?>"></iframe>
    </div>
</div>
