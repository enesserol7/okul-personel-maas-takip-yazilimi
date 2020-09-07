<?php $permissions = json_decode($item->permissions); ?>
<div class="widget widget-07 has-shadow">
  <!-- Begin Widget Header -->
  <div class="widget-header bordered d-flex align-items-center">
    <h2><?php echo "<b>$item->title</b> kaydının yetkilerini değiştiriyorsunuz"; ?></h2>
    <div class="widget-options">
      <div class="btn-group" role="group">
      </div>
    </div>
  </div>
  <!-- End Widget Header -->
  <!-- Begin Widget Body -->
  <div class="widget-body">
    <div class="table-responsive table-scroll padding-right-10" style="max-height: 520px; overflow: hidden; outline: none;" tabindex="5">
      <form action="<?php echo base_url("institution_user_roles/update_permissions/$item->id"); ?>" method="post">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th>Modül Adı</th>
              <th>Görüntüleme</th>
              <th>Ekleme</th>
              <th>Düzenleme</th>
              <th>Silme</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach (getControllerList() as $controllerName) { ?>
              <?php if ($this->session->userdata("user")) { ?>
                <tr>
                  <td><?php echo get_controller_listName($controllerName); ?></td>
                  <td class="w50 text-center">
                    <div class="media">
                      <div class="media-right align-self-center">
                        <label>
                          <input class="toggle-checkbox"
                          type="checkbox"
                          <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->read)) ? "checked" : ""; ?>
                          name="permissions[<?php echo $controllerName; ?>][read]">
                          <span>
                            <span></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </td>
                  <td class="w50 text-center">
                    <div class="media">
                      <div class="media-right align-self-center">
                        <label>
                          <input class="toggle-checkbox"
                          type="checkbox"
                          <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->write)) ? "checked" : ""; ?> name="permissions[<?php echo $controllerName; ?>][write]">
                          <span>
                            <span></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </td>
                  <td class="w50 text-center">
                    <div class="media">
                      <div class="media-right align-self-center">
                        <label>
                          <input class="toggle-checkbox"
                          type="checkbox"
                          <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->update)) ? "checked" : ""; ?> name="permissions[<?php echo $controllerName; ?>][update]">
                          <span>
                            <span></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </td>
                  <td class="w50 text-center">
                    <div class="media">
                      <div class="media-right align-self-center">
                        <label>
                          <input class="toggle-checkbox"
                          type="checkbox"
                          <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->delete)) ? "checked" : ""; ?> name="permissions[<?php echo $controllerName; ?>][delete]">
                          <span>
                            <span></span>
                          </span>
                        </label>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php }else{ ?>
                <?php if ($controllerName == "users" || $controllerName == "user_roles" || $controllerName == "userop" || $controllerName == "institutions") { ?>

                <?php }else{ ?>
                  <tr>
                    <td><?php echo get_controller_listName($controllerName); ?></td>
                    <td class="w50 text-center">
                      <div class="media">
                        <div class="media-right align-self-center">
                          <label>
                            <input class="toggle-checkbox"
                            type="checkbox"
                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->read)) ? "checked" : ""; ?>
                            name="permissions[<?php echo $controllerName; ?>][read]">
                            <span>
                              <span></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </td>
                    <td class="w50 text-center">
                      <div class="media">
                        <div class="media-right align-self-center">
                          <label>
                            <input class="toggle-checkbox"
                            type="checkbox"
                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->write)) ? "checked" : ""; ?> name="permissions[<?php echo $controllerName; ?>][write]">
                            <span>
                              <span></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </td>
                    <td class="w50 text-center">
                      <div class="media">
                        <div class="media-right align-self-center">
                          <label>
                            <input class="toggle-checkbox"
                            type="checkbox"
                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->update)) ? "checked" : ""; ?> name="permissions[<?php echo $controllerName; ?>][update]">
                            <span>
                              <span></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </td>
                    <td class="w50 text-center">
                      <div class="media">
                        <div class="media-right align-self-center">
                          <label>
                            <input class="toggle-checkbox"
                            type="checkbox"
                            <?php echo (isset($permissions->$controllerName) && isset($permissions->$controllerName->delete)) ? "checked" : ""; ?> name="permissions[<?php echo $controllerName; ?>][delete]">
                            <span>
                              <span></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              <?php } ?>
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