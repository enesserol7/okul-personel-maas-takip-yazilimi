<?php $permissions = json_decode($item->permissions); ?>
<div class="widget widget-07 has-shadow">
  <!-- Begin Widget Header -->
  <div class="widget-header bordered d-flex align-items-center">
    <h2><?php echo "<b>$item->full_name</b> kaydının yetkilerini değiştiriyorsunuz"; ?></h2>
    <div class="widget-options">
      <div class="btn-group" role="group">
      </div>
    </div>
  </div>
  <!-- End Widget Header -->
  <!-- Begin Widget Body -->
  <div class="widget-body">
    <div class="table-responsive table-scroll padding-right-10" style="max-height: 520px; overflow: hidden; outline: none;" tabindex="5">
      <form action="<?php echo base_url("institution_users/update_permissions/$item->id"); ?>" method="post">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th>Modül Adı</th>
              <th>İzin</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($institutions as $institution) { ?>
              <?php $institutionID = $institution->id; ?>
              <tr>
                <td><?php echo $institution->title; ?></td>
                <td class="w50 text-center">
                  <div class="media">
                    <div class="media-right align-self-center">
                      <label>
                        <input class="toggle-checkbox"
                        type="checkbox"
                        <?php echo (isset($permissions->$institutionID) && isset($permissions->$institutionID->read)) ? "checked" : ""; ?>
                        name="permissions[<?php echo $institution->id; ?>][read]">
                        <span>
                          <span></span>
                        </span>
                      </label>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <hr>
        <button type="submit" class="btn btn-primary btn-md btn-outline">Güncelle</button>
        <a href="<?php echo base_url("institution_user_roles"); ?>" class="btn btn-md btn-danger btn-outline">İptal</a>
      </form>
    </div>
  </div>
  <!-- End Widget Body -->
  <!-- Begin Widget Footer -->

  <!-- End Widget Footer -->
</div>