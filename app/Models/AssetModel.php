<?php
namespace App\Models;

use App\Models\BaseModel;

class AssetModel extends BaseModel
{
	
	public function initModel(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
		 parent::initModel($request, $response, $logger);
		 
	}
	
	public function get_asset_groups($user_id){
		$db = \Config\Database::connect();
		
		$builder = $db->table('asset_group');
		$builder->select('asset_group.*');
		$builder->join('asset_group_user', 'asset_group_user.asset_group_id = asset_group.id', 'LEFT');
		$builder->where('asset_group_user.user_id', $user_id);
            
        $query = $builder->get();
		$result = $query->getResultArray();
		
		//if this user has no asset groups, we make a new default group for their assets to appear in.
		if(!isset($result) or count($result) == 0){
			$asset_group = ["name" => "Default"];
			
			$builder = $db->table('asset_group');
			$builder->insert($asset_group);
			
			$asset_group_user = ["user_id" => $user_id, "asset_group_id" => $db->insertID(), "asset_group_role" => 1];
			$builder = $db->table('asset_group_user');
			$builder->insert($asset_group_user);
			
			$builder = $db->table('asset_group');
			$builder->select('asset_group.*');
			$builder->join('asset_group_user', 'asset_group_user.asset_group_id = asset_group.id', 'LEFT');
			$builder->where('asset_group_user.user_id', $user_id);
				
			$query = $builder->get();
			$result = $query->getResultArray();
		}
		
		return $result;
	}
	
	public function get_assets($user_id){
	    
		$db = \Config\Database::connect();
		
		$builder = $db->table('asset_group_user');
		$builder->select('asset.*');
		$builder->join('asset_group_asset', 'asset_group_asset.asset_group_id = asset_group_user.asset_group_id', 'LEFT');
		$builder->join('asset', 'asset.id = asset_group_asset.asset_id', 'LEFT');
		$builder->where('asset_group_user.user_id', $user_id);
		$builder->where('asset.id IS not NULL');
        
		
        $query = $builder->get();
		$result = $query->getResultArray();
		
		return $result;
	}
	
	public function add_asset($asset, $asset_group_id){
		$db = \Config\Database::connect();
		
		$builder = $db->table('asset');
		$builder->insert($asset);
		
		$asset_group_asset["asset_id"] = $db->insertID();
		$asset_group_asset["asset_group_id"] = $asset_group_id;
		
		$builder = $db->table('asset_group_asset');
		$builder->insert($asset_group_asset);
		
	}
}
?>