<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class TenantFilter implements FilterInterface
{
public function before(RequestInterface $request, $arguments = null)
{
// In production, set org_id based on subdomain or path
// Here, enforce queries to filter by session org_id (models handle it)
}

 public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
 {
// Log usage after action
$logger = new \App\Models\UsageLogModel();
// Corrected line to get the path
$logger->logAction(session()->get('user_id'), $request->getUri()->getPath());
 }
}