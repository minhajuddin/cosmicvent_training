class CreateTickets < ActiveRecord::Migration
  def self.up
    create_table :tickets do |t|
      t.string :name
      t.string :seat_id_seq
      t.text :address
      t.decimal :price_paid
      t.string :email_address

      t.timestamps
    end
  end

  def self.down
    drop_table :tickets
  end
end
