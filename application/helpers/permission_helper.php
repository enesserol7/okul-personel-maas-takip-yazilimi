<?php 
function isAllowedViewModule($moduleName = ""){
    $t = &get_instance();
    $moduleName = ($moduleName == "") ? $t->router->fetch_class() : $moduleName;
    $user = get_active_user();
    $user_roles = get_user_roles();
    if (isset($user_roles[$user->user_role_id])){
        $permission = json_decode($user_roles[$user->user_role_id]);
        if(isset($permission->$moduleName) && isset($permission->$moduleName->read)){
            return true;
        }
    }
    return false;
}
function isAllowedWriteModule($moduleName = ""){
    $t = &get_instance();
    $moduleName = ($moduleName == "") ? $t->router->fetch_class() : $moduleName;
    $user = get_active_user();
    $user_roles = get_user_roles();
    if (isset($user_roles[$user->user_role_id])){
        $permission = json_decode($user_roles[$user->user_role_id]);
        if(isset($permission->$moduleName) && isset($permission->$moduleName->write)){
            return true;
        }
    }
    return false;
}
function isAllowedUpdateModule($moduleName = ""){
    $t = &get_instance();
    $moduleName = ($moduleName == "") ? $t->router->fetch_class() : $moduleName;
    $user = get_active_user();
    $user_roles = get_user_roles();
    if (isset($user_roles[$user->user_role_id])){
        $permission = json_decode($user_roles[$user->user_role_id]);
        if(isset($permission->$moduleName) && isset($permission->$moduleName->update)){
            return true;
        }
    }
    return false;
}
function isAllowedDeleteModule($moduleName = ""){
    $t = &get_instance();
    $moduleName = ($moduleName == "") ? $t->router->fetch_class() : $moduleName;
    $user = get_active_user();
    $user_roles = get_user_roles();
    if (isset($user_roles[$user->user_role_id])){
        $permission = json_decode($user_roles[$user->user_role_id]);
        if(isset($permission->$moduleName) && isset($permission->$moduleName->delete)){
            return true;
        }
    }
    return false;
}
function isAllowedViewInstitution($institutionID = ""){
    $t = &get_instance();
    $institutionID = ($institutionID == "") ? $t->router->fetch_class() : $institutionID;
    $user = get_active_user();
    $user_roles = get_user_permissions();
    if (isset($user_roles[$user->id])){
        $permission = json_decode($user_roles[$user->id]);
        if(isset($permission->$institutionID) && isset($permission->$institutionID->read)){
            return true;
        }
    }
    return false;
}
?>