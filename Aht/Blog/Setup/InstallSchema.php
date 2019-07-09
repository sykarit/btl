<?php
namespace Aht\Blog\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('aht_blog_post')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('aht_blog_post')
			)
				->addColumn(
					'post_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Post ID'
				)
				->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Name'
				)
				->addColumn(
					'url_key',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'URL Key'
				)
				->addColumn(
					'image',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					null,
					['nullable' => true, 'default' => null],
					'Image'
				)

				->addColumn(
					'content',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					'64k',
					['nullable' => false],
					'Content'
				)
				->addColumn(
					'status',
					\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
					null,
					['nullable' => false, 'default' => '1'],
					'Status'
				)
				->addColumn(
					'created_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
					'Created At'
				)->addColumn(
					'updated_at',
					\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
					null,
					['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
					'Updated At'
				)
				->setComment('Blog Post Table');
			$installer->getConnection()->createTable($table);

			$installer->getConnection()->addIndex(
				$installer->getTable('aht_blog_post'),
				$setup->getIdxName(
					$installer->getTable('aht_blog_post'),
					['name', 'url_key', 'image', 'content'],
					\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
				),
				['name', 'url_key', 'image', 'content'],
				\Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
			);
		}
		if (!$installer->tableExists('aht_blog_contact')) {
			$table = $installer->getConnection()->newTable(
	            $installer->getTable('aht_blog_contact')
	        )->addColumn(
	            'contact_id',
	            \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
	            null,
	            [ 'identity' => true, 'nullable' => false, 'primary' => true, 'unsigned' => true, ],
	            'Entity ID'
	        )->addColumn(
	            'name',
	            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
	            255,
	            [ 'nullable' => false, ],
	            'Demo name'
	        )->addColumn(
	            'email',
	            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
	            255,
	            [ 'nullable' => false, ],
	            'Demo email'
	        )->addColumn(
	            'comment',
	            \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
	            255,
	            [ 'nullable' => false, 'default' => '0' ],
	            'Demo comment' 
	        )->addColumn(
	            'creation_time',
	            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
	            null,
	            [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT, ],
	            'Creation Time'
	        )->addColumn(
	            'update_time',
	            \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
	            null,
	            [ 'nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE, ],
	            'Modification Time'
	        )->addColumn(
	            'is_active',
	            \Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
	            null,
	            [ 'nullable' => false, 'default' => '1', ],
	            'Is Active'
	        );
	        $installer->getConnection()->createTable($table);
	    }
		$installer->endSetup();
	}
}