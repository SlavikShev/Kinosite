<form method="post" action="/admin/update">
    <input type="hidden" name="id" value="<?= $this->film['id'] ?>">
    <label>Year: <input type="year" name="year" value="<?= $this->film['year'] ?>" required></label>
    <label>Name: <input type="text" name="name" value="<?= $this->film['name'] ?>" required></label>
    <label>Description: <textarea name="description"><?= $this->film['description'] ?></textarea></label>
    <input type="submit" value="Send">
</form>
