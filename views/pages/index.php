<!--
  Página principal
 -->
<main>
  <form method="post" class="container" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="formFile"  class="form-label">Subir imagen</label>
      <input class="form-control" name="file" type="file" id="formFile">
    </div>
    <select name="format" class="form-select form-select-lg mb-3" aria-label="Large select example">
      <option selected>Selecciona la extension</option>
      <option value="jpg">JPG</option>
      <option value="png">PNG</option>
      <option value="webp">WEBP</option>
      <option value="avif">AVIF</option>
    </select>
    <input type="submit" value="Convertir" class="btn btn-info">
  </form>
</main>