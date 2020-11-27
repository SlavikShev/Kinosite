<form method="post" action="/admin/update">
    <input type="hidden" name="id" value="<?= $this->film['id'] ?>">
    <label>Year: <input type="year" name="year" value="<?= $this->film['year'] ?>" required></label>
    <label>Name: <input type="text" name="name" value="<?= $this->film['name'] ?>" required></label>
    <label>Description: <input type="text" name="description" value="<?= $this->film['description'] ?>" required></label>
    <input type="submit" value="Send">
</form>
