<form method="post" action="property_success.php">
    <?php if($edit_mode): ?>
        <input type="hidden" name="property_id" value="<?= $property_id ?>">
    <?php endif; ?>
    
    <input type="text" name="title" placeholder="Property Title" required>
    
    <input type="text" name="city" placeholder="City" required>
    
    <input type="number" name="rent" placeholder="Rent (₹)" min="1" required>
    
    <input type="text" name="image_url" placeholder="Image URL (optional)">
    
    <textarea name="description" placeholder="Property description..."></textarea>
    
    <button type="submit" class="btn full">
        <?= $edit_mode ? 'Update Property' : 'Add Property' ?>
    </button>
</form>
