class CreateEvents < ActiveRecord::Migration
  def self.up
    create_table :events do |t|
      t.string :artist
      t.text :description
      t.decimal :price_low
      t.decimal :price_high
      t.date :event_date

      t.timestamps
    end
  end

  def self.down
    drop_table :events
  end
end
