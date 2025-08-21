<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RBACFilter implements FilterInterface
{
public function before(RequestInterface $request, $arguments = null)
{
$userRole = session()->get('role_name');
$permissions = json_decode(session()->get('permissions'), true) ?? [];

if ($userRole === 'super_admin') {
return;// All access
}
foreach ($arguments ?? [] as $perm) {
if ($perm === 'all' && $userRole !== 'super_admin') {
return redirect()->back()->with('error', 'Access denied');
}
if (!in_array($perm, $permissions)) {
return redirect()->back()->with('error', 'Access denied');
}
}
}

 public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
 {
// Nothing
 } 
}
