<?php
namespace CSY2028;

interface Routes {
	public function getRoutes(): array;
	public function validate(): \CSY2028\ValidateLogin;
	public function checkpermission($permission): bool;
}