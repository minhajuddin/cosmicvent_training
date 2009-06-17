class CreateIncidents < ActiveRecord::Migration
  def self.up
    create_table :incidents do |t|
      t.string :mountain
      t.decimal :latitude
      t.decimal :longitude
      t.datetime :when
      t.string :title
      t.text :description

      t.timestamps
    end
  end

  def self.down
    drop_table :incidents
  end
end
