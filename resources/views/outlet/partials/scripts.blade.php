<script src="{{ asset('assets/js/js-datatables/simple-datatables@latest.js') }}"></script>
<script>
    const dataTable = new simpleDatatables.DataTable("#outlet-table");

    function openCreateModal() {
        clearForm();
        document.getElementById('outletModalLabel').innerText = 'Add Outlet';
        document.getElementById('outletForm').action = "{{ route('admin.outlets.store') }}";
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('submitButton').innerText = 'Create';
        var modal = new bootstrap.Modal(document.getElementById('outletModal'));
        modal.show();
    }

    function openEditModal(outlet) {
        clearForm();
        document.getElementById('outletModalLabel').innerText = 'Edit Outlet';
        document.getElementById('outletForm').action = `/admin/outlets/${outlet.id}`;
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('submitButton').innerText = 'Update';

        document.getElementById('outletId').value = outlet.id;
        document.getElementById('name').value = outlet.name;
        document.getElementById('location').value = outlet.location;
        document.getElementById('slug').value = outlet.slug;

        let statusValue = outlet.status ? 'active' : 'inactive';
        document.getElementById('status').value = statusValue;

        var modal = new bootstrap.Modal(document.getElementById('outletModal'));
        modal.show();
    }

    function clearForm() {
        document.getElementById('outletForm').reset();
        document.getElementById('outletId').value = '';
    }

    function showLinkModal(link) {
        document.getElementById('entryLink').value = link;
        var myModal = new bootstrap.Modal(document.getElementById('linkModal'));
        myModal.show();
    }

    function copyLink() {
        var copyText = document.getElementById("entryLink");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
    }

    function generateQRCode(outletId, slug) {
        if (!slug) {
            alert('Slug is required to generate QR code.');
            return;
        }

        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        fetch(`/admin/outlets/${outletId}/generate-qr`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify({ slug: slug })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('QR code generated and saved successfully!');
            } else {
                alert('Failed to generate QR code: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(err => {
            alert('Error generating QR code: ' + err.message);
        });
    }

    function confirmDelete(outletId, outletName) {
    // Set warning text
    document.getElementById('deleteWarningText').innerText =
        `Are you sure you want to delete the outlet "${outletName}"?`;

    // Update form action dynamically
    document.getElementById('deleteForm').action = `/admin/outlets/${outletId}`;

    // Show modal
    var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    modal.show();
}
  function showLinkModal(link) {
        document.getElementById('entryLink').value = link;
        var modal = new bootstrap.Modal(document.getElementById('linkModal'));
        modal.show();
    }
</script>
