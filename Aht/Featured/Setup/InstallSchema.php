<?php
namespace Aht\Featured\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('aht_featured_pro')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('aht_featured_pro')
			)
				->addColumn(
					'id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Pro ID'
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
					'is_featured',
					\Magento\Framework\DB\Ddl\Table::TYPE_SMALLINT,
					null,
					['nullable' => false, 'default' => '0'],
					'Featured'
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
				->setComment('Featured Products Table');
			$installer->getConnection()->createTable($table);
		}
		$installer->endSetup();
	}
}