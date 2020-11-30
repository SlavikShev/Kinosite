<form method="post" action="/admin/update" class="decor">
    <div class="form-left-decoration"></div>
    <div class="form-right-decoration"></div>
    <div class="circle"></div>
    <div class="form-inner">
        <input type="hidden" name="id" value="<?= $this->film['id'] ?>">
        <label>Year: <input type="year" name="year" value="<?= $this->film['year'] ?>" required></label>
        <label>Name: <input type="text" name="name" value="<?= $this->film['name'] ?>" required></label>
        <label>Description: <textarea name="description"><?= $this->film['description'] ?></textarea></label>
        <input type="submit" value="Send">
    </div>
</form>
